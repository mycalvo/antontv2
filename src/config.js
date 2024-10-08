module.exports = {
  db: {
    username: process.env.DB_USERNAME || 'root',
    password: process.env.DB_PASSWORD || '',
    database: process.env.DB_DATABASE || 'iptv',
    host: process.env.DB_HOST || 'localhost',
    dialect: 'postgres'
  },
  xtream: {
    apiUrl: 'http://remote-iptv-server/api',
    apiKey: 'your_api_key'
  }
};
