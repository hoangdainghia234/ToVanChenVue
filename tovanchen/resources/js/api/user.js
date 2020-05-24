import { sleep, get } from "./base";

async function getDataUser() {
  let users = await get('/api/users');
  return users;
}

async function getMe() {
    let auth = await get('/get-me');
    return auth.data;

  }

async function logout() {
    await get('/logout');
  }
export default {
  getDataUser,
  getMe,
  logout
};