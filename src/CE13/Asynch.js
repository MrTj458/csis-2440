function AJAXRequest() {
  try {
    http_request = new XMLHttpRequest()
  } catch (e) {
    try {
      http_request = new ActiveXObject("Msxm12.XMLHTTP")
    } catch (e) {
      try {
        http_request = new ActiveXObject("Microsoft.XMLHTTP")
      } catch (e) {
        alert("Broken!")
        return false
      }
    }
  }
  return http_request
}
