import api from "../../api/room";
const state = {
  rooms: []
};
const getters = {
  rooms: state => state.rooms
};

const actions = {
  async getDataRoomRequest({ commit }) {
    commit("getDataRoom", await api.getDataRoom());
  },
  async createNewRoomRequest({ commit }, data) {
    commit("createNewRoom", await api.createNewRoom(data));
  },
  async updateStatusRequest({ commit }, id) {
    commit("updateStatus", await api.updateStatus(id));
  }
};

const mutations = {
  getDataRoom(state, data) {
    state.rooms = data;
  },
  createNewRoom(state, data) {
    (state.rooms || []).push(data.data);
  },
  updateStatus(state, data) {
    let room = state.rooms.find(x => x.id == data.id);
    room.status = data.status
  },
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};