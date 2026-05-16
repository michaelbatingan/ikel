import { useState, useEffect } from "react";
import EmployeeTable from "./components/EmployeeTable";
import CreateEmployee from "./pages/CreateEmployee";
import { fetchAllEmployees } from "./services/employeeService";
import type { Employee } from "./types/employee";
import { Route, Routes, BrowserRouter } from "react-router-dom";
import "./App.css";

function App() {
  //props -> properties, parameter pipasan
  const [employees, setEmployees] = useState([] as Employee[]); 

  
  const fetchData = async () => {
    const data = await fetchAllEmployees();
    setEmployees(data);
  };

  useEffect(() => {
    fetchData();
  }, []); //fetch data on component mount

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<EmployeeTable employees={employees} />} />
          <Route path="/employee/create" element={<CreateEmployee />} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
