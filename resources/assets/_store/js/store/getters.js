const getters = {
    sidebar: state => state.app.sidebar,
    language: state => state.app.language,
    device: state => state.app.device,
    visitedViews: state => state.tagsView.visitedViews,
    cachedViews: state => state.tagsView.cachedViews,
    addRouters: state => state.permission.addRouters,
    errorLogs: state => state.errorLog.logs
};
export default getters
