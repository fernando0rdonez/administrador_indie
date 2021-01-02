import React,{useState} from 'react'
import ReactDOM from 'react-dom';
import axios from "axios"



const ClientePedido = () =>{
    const [respuesta, setRespuesta] = useState([]);
    const [cliente, setCliente] = useState({id : 0, nombre:""});
    const [text, setText] = useState("");

    const _search =  (value) => {   
        return axios.get(`/cliente/search?value=${value}`).then(
            response => {
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
        setText(value)
        if (value != "") {
            var response = await _search(value); 
            setRespuesta(response)
        }else{
            setRespuesta([])
        }
        
    
    }
    const  _handleClick = item => {
        console.log(item);
       setCliente(item);
       setRespuesta([])
       setText(item.nombre)
    }

    const ItemSearch = ({ data, index, _handleClick }) => {
        const _Click = () => {
            _handleClick(data)
        }
        return (
            <div key={index} className="flex flex-col hover:bg-gray-300" onClick={_Click}>
                <h3 className="font-bold">{data.nombre} </h3>
                <h4 className="font-normal">{data.cedula} </h4>
            </div>
        )
    }


    return (
        <>
         <label  className="block text-sm font-medium text-gray-700"  >Cliente</label>
                  <input type="hidden" name="cliente_id" value={cliente.id}   />
                  <input type="hidden" name="cliente"  value={cliente.nombre}  />
                  <input type="text" value={text} name="search" placeholder="Busca Cliente" onChange={_onChange} autoComplete="off" className="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></input> 
                    <div className="flex-auto">
                  {respuesta.map((data,index) => {
                    if (data) {
                    return (
                      <ItemSearch index={index} key={index} data={data} _handleClick={_handleClick} ></ItemSearch>
                    )	
                    }
                    return null
                })
                    } 
                    
            </div>
        </>
        
    );
}


export default ClientePedido;

if (document.getElementById('cliente')) {
    ReactDOM.render(<ClientePedido/>, document.getElementById('cliente'));
}