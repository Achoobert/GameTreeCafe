const fs = require("fs");
const filename = "assets/js/main.min.js";
const script = fs.readFileSync(filename);
const padStart = str => ("0" + str).slice(-2);

if (script.slice(0, 3) != "/**") {
  fs.writeFileSync(filename, banner + script);
}