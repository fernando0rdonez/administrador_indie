import React,{useState} from 'react'


const ItemPedido = ({data,index,handleMin }) =>{

    return (
        <div className="flex flex-row">
            <div className="justify-items-center">
                <img src={data.imagen} className="w-20 h-20 rounded-full "></img>
            </div>
             <input type="hidden" value={data.id} name="modelo_id[]" className="col-span-1 m-1 border border-gray-400 rounded h-10" />
             <input type="number" placeholder="Talla" name="talla[]" className="col-span-1 m-1 border border-gray-400 rounded  h-10 w-20" />
             <h1  className="col-span-1 m-1 border border-gray-400 h-10 w-20"> {data.nombre} </h1>
             <input type="number" placeholder="Cantidad" name="cantidad[]" className="col-span-1 m-1 border border-gray-400 rounded-sm h-10 w-20" />
             <div className="rounded-md m-3 p-3 bg-green-500 cursor-pointer text-white  text-center" onClick={()=>(handleMin(index))}>Min </div>

        </div>
    );
}


export default ItemPedido;

