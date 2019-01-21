
const formattedLines = (lines,lineCollection = []) =>{
    for(let b of lines){
        console.log('line ', b)
        let lineNew = {
            units : b.units,
            product_id : b.id
        };
        lineCollection.push(lineNew);
    }
    return lineCollection;
};
export default class {
    constructor(data ={}){
        this.init();
        Object.assign(this,data);
    }
    init(){
        this.is_customer = false;
        this.is_lines = false;
        this.customer ={name:null,email:'',contact:''};
        this.address = {route:null,number:null,neighborhood:null,city:null,state:null,complement:null,reference_point:null,postcode:null};
        this.lines = [];
    }

    toJSON(){
        let o = {
            customer: this.customer,
            address: this.address,
            contacts: this.contacts,
            lines: formattedLines(this.lines)
        };
        return o;

    }

}
