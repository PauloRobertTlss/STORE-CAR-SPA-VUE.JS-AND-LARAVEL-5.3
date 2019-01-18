const getters = {
    loading: state => state.app.loading,
    sidebar: state => state.app.sidebar,
    language: state => state.app.language,
    device: state => state.app.device,
    avatar: state => state.app.avatar,
    visitedViews: state => state.tagsView.visitedViews,
    cachedViews: state => state.tagsView.cachedViews,
    addRouters: state => state.permission.addRouters,
    errorLogs: state => state.errorLog.logs,
    permission_routers: state => state.permission.routers
};
export default getters
