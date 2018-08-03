const jwt = require("node.jwt");
const SECRET = process.env.VUE_APP_SECRET;

export function encodeData(params) {
  var token = jwt.encode(params, SECRET);
  return token;
}

export function decodeData(params) {
  var token = jwt.decode(params, SECRET);
  return token.payload;
}
