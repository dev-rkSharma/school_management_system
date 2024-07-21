function ajax(options) { //short ajax funtion
    const {
      url,
      method,
      data,
      dataType,
      success = () => {},
      error = () => {},
    } = options;
    const xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onload = () => {
      if (xhr.status >= 200 && xhr.status < 300) {
        success(xhr.responseText);
      } else {
        error(xhr.statusText);
      }
    };
    xhr.onerror = error;
    xhr.send(JSON.stringify(data));
  }