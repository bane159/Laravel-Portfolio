import * as THREE from './vendor/three/build/three.module.js';
// import { OrbitControls } from './vendor/three/examples/jsm/controls/OrbitControls.js';
// console.log("THREE RADDDDDDDIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII", THREE);
// Setup Scene, Camera, and Renderer
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 3000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('canvas-container').appendChild(renderer.domElement);

var textureLoader = new THREE.TextureLoader();
// var planetTexture1 = textureLoader.load('tekstura.png');

const ambientLight = new THREE.AmbientLight(0xffffff, 1);
scene.add(ambientLight);

// Starfield Function

window.addEventListener('resize', () => {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
});
createStars();

// Sun

// const sun = createSun(200, 0xffcc00);

const sunLight = new THREE.PointLight(0xffcc00, 2, 5000);
sunLight.position.set(0, 0, 0);
scene.add(sunLight);

// Planets


const planets = [];
let planetColor = Math.random() * 0xffffff; //random color
for (let i = 0; i < getRandomInRange(5, 10); i++) {
    planets[i] = createPlanet(getRandomInRange(50, 150), 0x232323, { x: getRandomInRange(-1000, 1500), y: getRandomInRange(-1000, 1500), z: getRandomInRange(-1000, 1500) })
}

// Camera Settings
let cameraAngle = 0;
let orbitRadius = 1000;
let mouseX = 0;
let mouseY = 0;

// Mouse Movement
document.addEventListener('mousemove', (event) => {
    mouseX = (event.clientX / window.innerWidth) * 2 - 1;
    mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
});

// Scroll Interaction (Zooming in and out)
let zoomSpeed = 10;
let zoomAmount = orbitRadius;

document.addEventListener('wheel', (event) => {
    let scrollTop = window.scrollY;
    let maxScroll = document.documentElement.scrollHeight - window.innerHeight;

    if (event.deltaY < 0 && scrollTop > 0) zoomAmount += zoomSpeed;
    else if (event.deltaY > 0 && scrollTop < maxScroll) zoomAmount -= zoomSpeed;
    
    zoomAmount = Math.min(Math.max(zoomAmount, 500), 2000);
});

// Animation Loop


animate();

// Handle Window Resize

function animate() {
    requestAnimationFrame(animate);
    
    // Orbit Camera Around Scene
    cameraAngle += 0.0003;
    camera.position.x = Math.cos(cameraAngle) * orbitRadius;
    camera.position.z = Math.sin(cameraAngle) * orbitRadius;
    camera.position.y = mouseY * 20;
    
    camera.lookAt(0, 0, 0); // Look at the center of the scene

    // orbitRadius = Math.max(orbitRadius - mouseY * 100, 500); // Adjust orbit radius based on mouse Y position
    // camera.position.x = Math.cos(cameraAngle) * orbitRadius;

    orbitRadius += 1 * (zoomAmount - orbitRadius); // Smoothly adjust orbit radius towards zoom amount
    // Rotate Planets
    planets.forEach(planet => planet.rotation.y += 0.01);
    
    renderer.render(scene, camera);
}
function createStars() {
    const starGeometry = new THREE.BufferGeometry();
    const starVertices = [];
    for (let i = 0; i < 5000; i++) {
        let x = (Math.random() - 0.5) * 4000;
        let y = (Math.random() - 0.5) * 4000;
        let z = (Math.random() - 0.5) * 4000;
        starVertices.push(x, y, z);
    }
    starGeometry.setAttribute('position', new THREE.Float32BufferAttribute(starVertices, 3));
    const starMaterial = new THREE.PointsMaterial({ color: 0xffffff, size: 1 });
    const stars = new THREE.Points(starGeometry, starMaterial);
    scene.add(stars);
}
function createSun(size, color) {
    const geometry = new THREE.SphereGeometry(size, 32, 32);
    const material = new THREE.MeshStandardMaterial({ color, emissive: color, emissiveIntensity: 2 });
    const sun = new THREE.Mesh(geometry, material);
    sun.position.set(0, 0, -800);
    sun.castShadow = true;
    scene.add(sun);
    return sun;
}
function createPlanet(size, color, position) {
    const geometry = new THREE.SphereGeometry(size, 32, 32);
    const material = new THREE.MeshStandardMaterial({ color: color }); // Ensure it's a StandardMaterial
    const planet = new THREE.Mesh(geometry, material);
    planet.position.set(position.x, position.y, position.z);
    scene.add(planet);

    const planetLight = new THREE.PointLight(0xffffff, 1, 1000);
    planetLight.position.copy(position);
    scene.add(planetLight);

    return planet;
}
function createPlanetWithTexture(size, textureUrl, position) {
    const geometry = new THREE.SphereGeometry(size, 32, 32);
    const texture = textureLoader.load(textureUrl);
    const material = new THREE.MeshStandardMaterial({ map: texture });
    const planet = new THREE.Mesh(geometry, material);
    planet.position.set(position.x, position.y, position.z);
    scene.add(planet);
    return planet;
}
function createPlanetWithTextureAndLight(size, textureUrl, position) {
    const geometry = new THREE.SphereGeometry(size, 32, 32);
    const texture = textureLoader.load(textureUrl);
    const material = new THREE.MeshStandardMaterial({ map: texture });
    const planet = new THREE.Mesh(geometry, material);
    planet.position.set(position.x, position.y, position.z);
    scene.add(planet);

    const planetLight = new THREE.PointLight(0xffffff, 1, 1000);
    planetLight.position.copy(position);
    scene.add(planetLight);

    return planet;
}


function getRandomInRange(min, max) {
    return Math.random() * (max - min) + min;
}






























