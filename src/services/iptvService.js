const axios = require('axios');
const config = require('../config').xtream;

const getLiveChannels = async () => {
  try {
    const response = await axios.get(`${config.apiUrl}/player_api.php`, {
      params: {
        action: 'get_live_streams',
        api_key: config.apiKey
      }
    });
    return response.data;
  } catch (err) {
    console.error('Error fetching live channels:', err.message);
    return [];
  }
};

const handleErrors = () => {
  // Lógica para manejar errores y cambiar de servidor remoto si es necesario
  console.info('Handling errors and switching servers if necessary');
};

module.exports = {
  getLiveChannels,
  handleErrors
};
