import React,{useState} from 'react'


const ItemPedido = ({data,index,handleMin }) =>{

    return (
        <div className="flex flex-row ">

            <table>

               <tbody>

                   <tr>
                   <td> <div className="justify-items-center">
                <img src={data.imagen} className="w-12 h-12 rounded-full "></img>
            </div></td>
                   <td> <input type="hidden" value={data.id} name="modelo_id[]" className="col-span-1 m-1 border text-center  border-gray-400 rounded h-10" /></td>
                   <td>  <input type="number"required  placeholder="Talla" name="talla[]" className="col-span-1 m-1 text-center  border border-gray-400 rounded  h-10 w-20" /></td>
                   <td> <h1  className="col-span-1 m-1 border border-gray-400 h-10 w-40 p-2"> {data.nombre} </h1></td>
                   <td> <input type="number" required placeholder="Cantidad" name="cantidad[]" className="col-span-1 m-1 border text-center  border-gray-400 rounded-sm h-10 w-20" /></td>
                   <td>  <input type="precio" required placeholder="Precio" name="precio[]" className="col-span-1 m-1 border text-center  border-gray-400 rounded-sm h-10 w-20" /></td>
                   <td>  <div className="rounded-md p-3 bg-red-700 h-10 cursor-pointer text-white  text-center" onClick={()=>(handleMin(index))}><i class="fas fa-minus-circle text-black"></i></div></td>

                   </tr>

               </tbody>

             </table> 


        </div>
    );
}


export default ItemPedido;

