import { BrowserRouter, Routes, Route } from "react-router-dom";

import RegisterPage from "./pages/RegisterPage";
import LoginPage from "./pages/LoginPage"

import IndexCli from "./pages/indexCli";
import DeleteCli from "./pages/DeleteCli";
import UpdateCli from "./pages/UpdateCli";

import IndexVehi from "./pages/IndexVehi";

import IndexRes from "./pages/IndexRes";

import DeleteVehi from "./pages/DeleteVehi";

import DeleteRes from "./pages/DeleteRes";

import RegisterVehicle from "./pages/RegisterVehicle";

import RegisterReserve from "./pages/RegisterReserva";

import IndexPage from "./pages/IndexPage"
import RegistryPage from "./pages/RegistryPage"
import { AuthProvider } from "./context/authContext";

import {RequestProvider} from "./context/requestsContext"

function App() {

  /*
  back:
  zor: validaciones 
  
  
  react hook form - formulacion cambio de estado, validacion 
     axios - conexion con back 
     tailwind
  */
  return (
    <AuthProvider>
      <RequestProvider>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<h1 className="text-3xl font-bold underline">Hello world!</h1> }/>
          <Route path="/login" element={<LoginPage/>}/>

{/* crud clientes */} 
          <Route path="/registerUser" element={<RegisterPage />}/>
          <Route path="/indexCli" element={<IndexCli/>}/>
          <Route path="/deleteCli" element={<DeleteCli/>}/>
          <Route path="/updateCli" element={<UpdateCli/>}/>

{/* crud vehiculos */}
          <Route path="/registerVehicle" element={<RegisterVehicle />}/>
          <Route path="/indexVehi" element={<IndexVehi/>}/>
          <Route path="/deleteVehi" element={<DeleteVehi/>}/>

{/* crud reservas */}
          <Route path="/registerReserve" element={<RegisterReserve />}/>
          <Route path="/deleteRes" element={<DeleteRes/>}/>
          <Route path="/indexRes"  element={<IndexRes/>}/>


          <Route path="/index"  element={<IndexPage/>}/>
          <Route path="/registry"  element={<RegistryPage/>}/>
        </Routes>
    </BrowserRouter>
      </RequestProvider>
      
    </AuthProvider>

  )
}

export default App