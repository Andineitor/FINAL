import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const IndexVehi = () => {
  const [clientes, setClientes] = useState([]);
  const [nuevoCliente, setNuevoCliente] = useState('');

  const agregarCliente = () => {
    if (nuevoCliente.trim() !== '') {
      setClientes([...clientes, nuevoCliente]);
      setNuevoCliente('');
    }
  };

  const eliminarCliente = (index) => {
    const nuevosClientes = [...clientes];
    nuevosClientes.splice(index, 1);
    setClientes(nuevosClientes);
  };

  return (
    <div
      style={{
        maxWidth: '600px',
        margin: 'auto',
        padding: '20px',
        border: '1px solid #ccc',
        borderRadius: '5px',
        boxShadow: '0 0 10px rgba(0, 0, 0, 0.1)',
      }}
    >
      <h1>Gestión de Vehiculos</h1>

      <div
        style={{
          marginBottom: '15px',
          display: 'flex',
          alignItems: 'center',
        }}
      >
        <Link to="/registerVehicle" style={{ textDecoration: 'none' }}>
          <button
            style={{
              padding: '8px 15px',
              cursor: 'pointer',
              backgroundColor: '#4caf50',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
            }}
          >
            Crear
          </button>
        </Link>
      </div>

      <div
        style={{
          marginBottom: '15px',
          display: 'flex',
          alignItems: 'center',
        }}
      >
        <Link to="/deleteCli" style={{ textDecoration: 'none' }}>
          <button
            style={{
              padding: '8px 15px',
              cursor: 'pointer',
              backgroundColor: '#4caf50',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
            }}
          >
            Eliminar
          </button>
        </Link>
      </div>

      <div
        style={{
          marginTop: '15px',
          display: 'flex',
        }}
      >
        <Link to="/updateCli">
          <button
            style={{
              marginRight: '10px',
              padding: '8px 15px',
              cursor: 'pointer',
              backgroundColor: '#3498db',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
            }}
          >
            Actualizar
          </button>
        </Link>
        <Link to="/visualizar">
          <button
            style={{
              padding: '8px 15px',
              cursor: 'pointer',
              backgroundColor: '#34495e',
              color: 'white',
              border: 'none',
              borderRadius: '4px',
            }}
          >
            Visualizar
          </button>
        </Link>
      </div>
    </div>
  );
};

export default IndexVehi;
