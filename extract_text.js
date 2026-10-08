const fs = require('fs');

function extractTextValues(obj) {
    let strings = [];
    if (typeof obj === 'string') {
        // if it looks like HTML, maybe strip some tags, but it's fine for now
        if (obj.length > 5 && !obj.match(/^[a-z0-9_]+$/i)) {
            strings.push(obj);
        }
    } else if (Array.isArray(obj)) {
        obj.forEach(item => strings.push(...extractTextValues(item)));
    } else if (typeof obj === 'object' && obj !== null) {
        for (const key in obj) {
            if (['url', 'id', 'elType', 'widgetType', '_id', 'library', 'value'].includes(key)) continue;
            strings.push(...extractTextValues(obj[key]));
        }
    }
    return strings;
}

const file = process.argv[2];
try {
    const data = JSON.parse(fs.readFileSync(file, 'utf8'));
    const texts = extractTextValues(data);
    const uniqueTexts = [...new Set(texts)].filter(t => t.length > 10).join('\n---\n');
    console.log(uniqueTexts);
} catch(e) {
    console.error(e);
}
