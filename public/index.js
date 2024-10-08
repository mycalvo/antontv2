const express = require('express');
const bodyParser = require('body-parser');
const userController = require('../src/controllers/userController');
const path = require('path');

const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.json());

// Rutas de API
app.get('/user/:id', userController.getUserInfo);
app.get('/users', userController.getAllUsers);
app.post('/user', userController.createUser);
app.put('/user/:id', userController.updateUser);
app.delete('/user/:id', userController.deleteUser);

// Ruta para el panel de administración
app.get('/admin', (req, res) => {
  res.sendFile(path.join(__dirname, '../src/views/admin.html'));
});

// Ruta para la raíz
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, '../src/views/admin.html'));
});

// Ruta para el archivo estático index.html
app.get('/index.html', (req, res) => {
  res.sendFile(path.join(__dirname, '../src/views/index.html'));
});

app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
