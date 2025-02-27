import * as THREE from 'three';
import {EffectComposer} from 'three/examples/jsm/postprocessing/EffectComposer.js';
import {RenderPass} from 'three/examples/jsm/postprocessing/RenderPass.js';
import {UnrealBloomPass} from 'three/examples/jsm/postprocessing/UnrealBloomPass.js';

// Szene, Kamera und Renderer erstellen
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 2000);
const renderer = new THREE.WebGLRenderer({antialias: true});
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.toneMapping = THREE.ReinhardToneMapping;
document.body.appendChild(renderer.domElement);

// Post-Processing Composer und Bloom-Effekt
const composer = new EffectComposer(renderer);
composer.addPass(new RenderPass(scene, camera));

const bloomPass = new UnrealBloomPass(
  new THREE.Vector2(window.innerWidth, window.innerHeight),
  1.5, // Stärke des Bloom-Effekts
  0.4, // Radius des Bloom-Effekts
  0.85 // Schwellenwert des Bloom-Effekts
);
composer.addPass(bloomPass);

// Linienmaterial und Geometrie erstellen
const points = [];

// Anzahl der Vektoren reduzieren
for (let i = 0; i < 100; i++) {
  points.push(new THREE.Vector3(
    (Math.random() - 0.5) * 500,
    (Math.random() - 0.5) * 500,
    (Math.random() - 0.5) * 500
  ));
}

const geometry = new THREE.BufferGeometry().setFromPoints(points);

// Linienmaterial ändern, um dickere Linien und Farbverläufe zu haben
const material = new THREE.ShaderMaterial({
  uniforms: {
    color: {value: new THREE.Color(0xffffff)},
    time: {value: 0}
  },
  vertexShader: `
        varying vec3 vColor;
        uniform float time;
        void main() {
            vColor = vec3(0.5 + 0.5 * sin(time + position.x), 0.5 + 0.5 * sin(time + position.y), 0.5 + 0.5 * sin(time + position.z));
            gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
        }
    `,
  fragmentShader: `
        varying vec3 vColor;
        void main() {
            gl_FragColor = vec4(vColor, 1.0);
        }
    `,
  linewidth: 5 // Dickere Linien
});

const line = new THREE.Line(geometry, material);
scene.add(line);

camera.position.z = 1000; // Kamera weiter entfernt

// Animationsfunktion
function animate() {
  requestAnimationFrame(animate);

  // Linien rotieren lassen
  line.rotation.x += 0.005;
  line.rotation.y += 0.005;

  // Zeituniform aktualisieren
  material.uniforms.time.value += 0.01;

  composer.render();
}

animate();

// Fenstergröße anpassen
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
  composer.setSize(window.innerWidth, window.innerHeight);
});
