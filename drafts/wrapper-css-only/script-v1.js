// Szene, Kamera und Renderer erstellen
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 125, 1000000000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Linienmaterial und Geometrie erstellen
const points = [];

// Anzahl der Vektoren reduzieren
for (let i = 0; i < 30; i++) {
  points.push(new THREE.Vector3(
    (Math.random() - 0.5) * 500,
    (Math.random() - 0.5) * 500,
    (Math.random() - 0.5) * 500
  ));
}

const geometry = new THREE.BufferGeometry().setFromPoints(points);

// Linienmaterial ändern, um dickere Linien und Farbverläufe zu haben
const material = new THREE.LineBasicMaterial({
  vertexColors: true,
  linewidth: 5 // Dickere Linien
});

// Farbverläufe hinzufügen
const colors = [];

for (let i = 0; i < points.length; i++) {
  const color = new THREE.Color();
  color.setHSL(i / points.length, 1.0, 0.5);
  colors.push(color.r, color.g, color.b);
}

geometry.setAttribute('color', new THREE.Float32BufferAttribute(colors, 3));

const line = new THREE.Line(geometry, material);
scene.add(line);

camera.position.z = 200;

// Animationsfunktion
function animate() {
  requestAnimationFrame(animate);

  // Linien rotieren lassen
  line.rotation.x += 0.001;
  line.rotation.y += 0.001;

  renderer.render(scene, camera);
}

animate();

// Fenstergröße anpassen
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});
