import request from '_@/js/utils/request'

export function fetchList(api,query) {return request({url: `v1/${api}`,method: 'get',params: query})}
export function getInfo(api,cid,query) {return request({url: `v1/${api}/${cid}`,method: 'get' ,params: query})}