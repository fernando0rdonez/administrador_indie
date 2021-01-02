import React from 'react'

const ItemSearch = ({item, handleAdd}) =>{

    return (
        <div className="grid grid-cols-5">
            <div className="col-span-1 justify-items-center">
                <img src={item.imagen} className="w-20 h-20 rounded-full "></img>
            </div>
            <div className="col-span-3">
                <h3 className="font-bold">{item.nombre} </h3>
                <div className="flex flex-row">
                    <h4 className="font-normal">Eva: {item.eva} </h4>
                    <h4 className="font-normal"> Genero: {item.genero}</h4>
                </div>
            </div>
            <div className="col-span-1 justify-center">
                <div className="rounded-md m-3 p-3 bg-green-500 cursor-pointer text-white  text-center" onClick={()=>(handleAdd(item))}>Agregar </div>
            </div>
        </div>
    );
}


export default ItemSearch;