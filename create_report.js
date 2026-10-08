const fs = require('fs');
const path = require('path');

const files = fs.readdirSync(__dirname).filter(f => f.startsWith('elementor_data_post_') && f.endsWith('.json'));

let markdown = `# Extracted Data Report\n\n`;
markdown += `This report outlines all the pages, templates, and components extracted from the WordPress Elementor SQL dump (\`u894712264_OdPBc (1).sql\`).\n\n`;
markdown += `### Summary\n`;
markdown += `- **Total Items Extracted:** ${files.length}\n`;
markdown += `- **Purpose:** Used to migrate the old WordPress site into the new Next.js framework.\n\n`;

markdown += `### Extracted Pages & Components\n`;

// Grouping and cleaning names
const uniqueNames = new Set();
files.forEach(file => {
    let name = file.replace('elementor_data_post_', '').replace('.json', '').replace(/^\d+_/, '');
    uniqueNames.add(name);
});

Array.from(uniqueNames).sort().forEach(name => {
    markdown += `- ${name}\n`;
});

fs.writeFileSync('Extracted_Data_Report.md', markdown);
console.log('Markdown report created.');
