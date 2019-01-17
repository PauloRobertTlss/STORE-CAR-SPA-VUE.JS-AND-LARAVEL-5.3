import request from '_@/js/utils/request'

export function fetchList(query) {return request({url: `v1/products`,method: 'get',params: query})}
export function getInfo(cid,query) {return request({url: `v1/products/${cid}`,method: 'get' ,params: query})}