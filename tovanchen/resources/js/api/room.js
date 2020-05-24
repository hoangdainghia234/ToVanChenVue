import { sleep, get, post, patch } from "./base";

async function getDataRoom() {
  let rooms = await get('/api/rooms');
  return rooms.data;
}

async function createNewRoom(data) {
  let results = await post('/api/rooms', data);
  return results;
}

async function updateStatus(id) {
  let results = await patch('/api/rooms/'+id, {column: 'status'});
  return results.data;
}

export default {
  getDataRoom,
  createNewRoom,
  updateStatus
};