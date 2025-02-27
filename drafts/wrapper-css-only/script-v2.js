// Szene, Kamera und Renderer erstellen
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 2000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

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

camera.position.z = 1000; // Kamera weiter entfernt

// Animationsfunktion
function animate() {
  requestAnimationFrame(animate);

  // Linien rotieren lassen
  line.rotation.x += 0.005;
  line.rotation.y += 0.005;

  // Farbverlauf ändern
  const time = Date.now() * 0.001;
  const h = (360 * (1.0 + time % 360) / 360) % 1.0;
  for (let i = 0; i < colors.length; i += 3) {
    const color = new THREE.Color();
    color.setHSL((i / colors.length + h) % 1.0, 1.0, 0.5);
    colors[i] = color.r;
    colors[i + 1] = color.g;
    colors[i + 2] = color.b;
  }
  geometry.attributes.color.needsUpdate = true;

  renderer.render(scene, camera);
}

animate();

// Fenstergröße anpassen
window.addEventListener('resize', () => {
  camera.aspect = window.innerWidth / window.innerHeight;
  camera.updateProjectionMatrix();
  renderer.setSize(window.innerWidth, window.innerHeight);
});
