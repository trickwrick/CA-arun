const fs = require('fs');

const sql = fs.readFileSync('u894712264_OdPBc (1).sql', 'utf8');

// The SQL dump inserts into wp_postmeta using statements like:
// INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
// (888, 12, '_elementor_data', '[{\"id\":\"fc938ad\",...}]'),

// Let's use regex to find all _elementor_data.
// Since the JSON is a string literal, we need to be careful.
// A simpler approach: split the file into lines or match globally.
// However, a single INSERT statement might be on one line or multiple.
// Let's just match the pattern: , `post_id`, '_elementor_data', '...'
// Actually, it's (meta_id, post_id, '_elementor_data', 'JSON_STRING')

const regex = /\((\d+),\s*(\d+),\s*'_elementor_data',\s*'(.*?)'\)/g;

let match;
const data = {};

while ((match = regex.exec(sql)) !== null) {
    const meta_id = match[1];
    const post_id = match[2];
    let jsonStr = match[3];
    
    // Unescape the SQL string
    jsonStr = jsonStr.replace(/\\'/g, "'").replace(/\\\\/g, "\\");
    
    data[post_id] = jsonStr;
}

// Now let's find the page titles from wp_posts
// INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, ...
// Values look like: (12, 1, '2023-08-01 10:00:00', '2023-08-01 10:00:00', '...', 'Home', ... )

const postRegex = /\((\d+),\s*\d+,\s*'[^']*',\s*'[^']*',\s*'(?:[^'\\]|\\.)*',\s*'([^']+)'/g;
const titles = {};

while ((match = postRegex.exec(sql)) !== null) {
    const post_id = match[1];
    const title = match[2];
    titles[post_id] = title;
}

const result = [];
for (const [postId, elementorData] of Object.entries(data)) {
    result.push({
        post_id: postId,
        title: titles[postId] || 'Unknown',
        data_preview: elementorData.substring(0, 100) + '...'
    });
    // Let's write the full JSON to a file for this post
    try {
        fs.writeFileSync(`elementor_data_post_${postId}_${titles[postId] || 'Unknown'}.json`, elementorData);
    } catch(e) {}
}

console.log("Extracted Elementor Data for Posts:");
console.table(result);
