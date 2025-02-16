import { useRef, useState } from 'react'
import { Canvas, useFrame } from '@react-three/fiber'
import { Box as BoxDREI } from '@react-three/drei'

import BoxThreeD from './components/BoxThreeD'

// import logo from './logo.svg'
import './App.css'

const ThreeScene: React.FC = () => {
  // **
  return (
    <Canvas>
      <ambientLight />
      <pointLight position={[10, 10, 10]} />
      {/* <BoxDREI 
        position={[0, 0, 0]}
      >
        <meshStandardMaterial color="orange" />
      </BoxDREI> */}
      <BoxThreeD route='/' />
    </Canvas>
  )
}

function App() {
  console.debug('DOM fully loaded, initializing React app...')
  console.debug('Root element:', document.getElementById('threed-root'))
  return (
    <div className="App">
      <header className="App-header">
        {/* <img src={logo} className="App-logo" alt="logo" /> */}
        {/* <p>
          Edit <code>src/App.tsx</code> and save to reload.
        </p> */}
        {/* <a
          className="App-link"
          href="https://react.dev/"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a> */}
      </header>

      <ThreeScene />
      
    </div>
  )
}

export default App
