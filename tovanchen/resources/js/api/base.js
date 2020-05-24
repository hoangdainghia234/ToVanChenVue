import axios from "axios";

let VuexStore = null;
export const getStore = store => (VuexStore = store);

async function get(url, options) {
  try {
    const response = await axios.get(url, options);
    return response.data;
  } catch (e) {
    showMessage(e);
    throw e;
  }
}

async function post(url, data) {
  try {
    const response = await axios.post(url, data);
    return response.data;
  } catch (e) {
    showMessage(e);
    throw e;
  }
}

async function patch(url, data) {
  try {
    const response = await axios.patch(url, data);
    return response.data;
  } catch (e) {
    showMessage(e);
    throw e;
  }
}

async function put(url, data) {
  try {
    const response = await axios.put(url, data);
    return response.data;
  } catch (e) {
    showMessage(e);
    throw e;
  }
}

async function remove(url, data) {
  try {
    const response = await axios.delete(url, data);
    return response.data;
  } catch (e) {
    showMessage(e);
    throw e;
  }
}

function showMessage(e) {
  if (e.response) {
    const erorrs = e.response.data;
    let messages = [];
    Object.keys(erorrs).forEach(key => {
      if (Array.isArray(erorrs[key])) {
        erorrs[key].forEach(key2 => {
          messages = [...messages, key2];
        });
        return;
      } else if (Array.isArray(erorrs[key][0])) {
        erorrs[key][0].forEach(key2 => {
          messages = [...messages, key2];
        });
        return;
      } else {
        messages = [...messages, erorrs[key]];
        return;
      }
    });
    VuexStore.commit("snackbar/setMessages", messages);
  } else {
    VuexStore.commit("snackbar/setMessages", ["An unknown error"]);
  }
}

async function sleep(time = 500) {
  return new Promise(resolve => {
    setTimeout(() => resolve(), time);
  });
}

export { get, post, patch, remove, sleep, put };