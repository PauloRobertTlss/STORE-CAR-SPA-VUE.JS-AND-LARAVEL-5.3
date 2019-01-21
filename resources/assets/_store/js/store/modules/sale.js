
import Sale from '../../models/sale'
import {storeSale} from "../../api/sales";
import _ from 'lodash'

const formattedInGroup = (rows) =>{

    let result =  _(rows).groupBy('id')
        .map((objs, key) => ({
            'id': key,
            'units': _.sumBy(objs, 'units')
        }))
        .value();
    let formatted = _.uniqBy(rows, function (e) {
        return e.id;
    });

    for(var i=0;i < result.length;i++){
        let index = _.findIndex(formatted,{id: parseInt(result[i].id)});
        if(index !== -1) {
            formatted[index].units = result[i].units;
            formatted[index].sum_prices = (formatted[index].units * formatted[index].price);
        }
    }
    return formatted
};

const sale = {
    state: {
        sale: new Sale()
    },
    mutations: {
        ADD_LINE:(state,line)=>{
            const index = _.findIndex(state.sale.lines,{id:line.id})
            if(index !== -1){
                let element = state.sale.lines[index]
                element.units++
                state.sale.lines.splice(index,1,element);
                return;
            }
            line.units =1;
            state.sale.lines.push(line)
        },
        REMOVER_LINE: (state,line) => {
            let index = _.findIndex(state.sale.lines,{id:line.id})
            console.log('index remover',index)
            if(index!==-1){
                state.sale.lines.splice(index,1)
            }
        },
        INCREMENT_LINE: (state,line) => {
            let index = _.findIndex(state.sale.lines,{id:line.id})
            console.log('index increment',index)
            if(index!==-1){
                let element = state.sale.lines[index]
                element.units++
                state.sale.lines.splice(index,1,element);
                return;
            }
        },
        DECREMENT_LINE: (state,line) => {
            let index = _.findIndex(state.sale.lines,{id: line.id})
            if(index!==-1){
                let element = state.sale.lines[index]
                element.units--
                if(element.units === 0){
                    state.sale.lines.splice(index,1)
                }else {
                    state.sale.lines.splice(index, 1, element);
                }
                return;
            }
        }
    },
    actions: {
        saveSale({commit, state}) {
            return storeSale(state.sale.toJSON()).then((response) => {
                return response;
            });
        }
    },
    getters: {
        sumUnits(state){
            return _.sumBy(state.sale.lines, 'units');
        },
        sumSale(state){
            let group = formattedInGroup(state.sale.lines);
            return _.sumBy(group, 'sum_prices');
        }
    }
};

export default sale
