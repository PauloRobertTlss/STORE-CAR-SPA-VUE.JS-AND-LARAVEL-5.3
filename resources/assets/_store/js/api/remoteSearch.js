import request from '_@/js/utils/request'

export function buscarCep(query) { return request({ url: '/v1/buscarCep',method: 'get', params: query })}

