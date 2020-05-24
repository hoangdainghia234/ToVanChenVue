import api from "../../api/user";
const state = {
  users: [],
  auth: {}
};
const getters = {
  users: state => state.users,
  auth: state => state.auth,
};

const actions = {
  async getDataUserRequest({ commit }) {
    commit("getDataUser", await api.getDataUser());
  },

  async getMeRequest({ commit }) {
    commit("getMe", await api.getMe());
  },

  async logoutRequest({ commit }) {
    await api.logout();
  },

};

const mutations = {
  getDataUser(state, data) {
    state.users = data;
  },
  getMe(state, data) {
    state.auth = {
      id: data.id,
      full_name: data.user_profile.first_name + ' ' + data.user_profile.last_name,
      avatar: data.user_profile.avatar,
      email: data.email,
      role: data.role == 0 ? 'admin' : 'customer'
    }
  }
};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
};