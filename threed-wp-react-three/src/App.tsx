import React from 'react';
import { Canvas } from '@react-three/fiber';
import { Box } from '@react-three/drei';
// import logo from './logo.svg';
import './App.css';

const ThreeScene: React.FC = () => {
  return (
    <Canvas>
      <ambientLight />
      <pointLight position={[100, 100, 100]} />
      <Box position={[0, 0, 0]}>
        <meshStandardMaterial color="orange" />
      </Box>
    </Canvas>
  );
};

function App() {
  console.debug('DOM fully loaded, initializing React app...');
  console.debug('Root element:', document.getElementById('threed-root'));
  return (
    <div className="App">
      <header className="App-header">
        {/* <img src={logo} className="App-logo" alt="logo" /> */}
        <p>
          Edit <code>src/App.tsx</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>

      <ThreeScene />
      
    </div>
  );
}

export default App;
