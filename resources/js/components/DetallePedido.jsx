import React,{useState} from 'react'
import ReactDOM from 'react-dom';
import axios from "axios"
import ItemSearch from './ItemSearch';
import ItemPedido from './ItemPedido';


const DetallePedido = () =>{
    const [respuesta, setRespuesta] = useState([]);
    const [pedido, setPedido] = useState([]);
    const [show, setShow] = useState(false);



    const _search =  (value) => {   
        return axios.get(`/modelo/search?value=${value}`).then(
            response => {
                console.log(response.data)
                return response.data;
            },
            error => {
                console.log(error)
                return error;
            }
        );
    }

    const _onChange = async event => {

        const value = event.target.value;
        if (value != "") {
            var response = await _search(value); 
            setRespuesta(response)
        }else{
            setRespuesta([])
        }
        
    
    }
    const  handleAdd = (item) => {
        const newList = pedido.concat({ item });
        setPedido(newList);
    }

    const  handleMin = (item) => {
        const newList = pedido.map((data,index) => {
            if (index != item) {
                return data
            }
        })
        setPedido(newList);
    }

    return (
        <>
        <div className="flex flex-col">
            <div className="p-2 m-3 border-green-400 border ">
                 <input type="text" name="search" placeholder="Busca modelo" onChange={_onChange} autoComplete="off" className="w-full"></input> 
            </div>   
            {respuesta.map((data,index) => {
                    if (data) {
                    return (
                        <ItemSearch key={index} item={data} handleAdd={handleAdd} ></ItemSearch>	
                    )	
                    }
                    return null
                })
            } 
            <h2 className="font-medium text-gray-700 my-7 text-xl"> Detalle pedido</h2>   
        </div>
        {pedido.map((data,index) => {
                    if (data) {
                        return (<ItemPedido key={index} data={data.item} index={index} handleMin={handleMin}></ItemPedido>)	
                    }
                    return null
                })}
        </>
        
    );
}


export default DetallePedido;

if (document.getElementById('detalle')) {
    ReactDOM.render(<DetallePedido />, document.getElementById('detalle'));
}