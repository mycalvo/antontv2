const express = require('express');
const bodyParser = require('body-parser');
const userController = require('../src/controllers/userController');
const path = require('path');

const app = express();
const port = process.env.PORT || 3000;

app.use(bodyParser.json());

app.get('/user/:id', userController.getUserInfo);
app.get('/users', userController.getAllUsers);
app.post('/user', userController.createUser);
app.put('/user/:id', userController.updateUser);
app.delete('/user/:id', userController.deleteUser);

app.get('/admin', (req, res) => {
  res.sendFile(path.join(__dirname, '../src/views/admin.html'));
});

app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
