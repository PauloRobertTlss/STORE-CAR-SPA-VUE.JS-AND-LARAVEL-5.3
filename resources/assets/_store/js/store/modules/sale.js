
import Sale from '../../models/sale'
import _ from 'lodash'

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
        REMOVE_LINE: (state,line) => {
            let index = _.indexOf(state.sale.lines,{id:line.id})
            if(index!==-1){
                state.sale.lines.splice(index,0)
            }
        }
    },
    actions: {
    },
    getters: {
        sumUnits(state){
            return _.sumBy(state.sale.lines, 'units');
        },
    }
};

export default sale
