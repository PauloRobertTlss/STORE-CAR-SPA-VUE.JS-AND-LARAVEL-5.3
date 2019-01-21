import request from '_@/js/utils/request'

export function storeSale(data) {return request({url: `v1/sales`,method: 'post', data})}