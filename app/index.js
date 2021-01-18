const express = require('express')
const app = express()
const routes = require('./routes')
const path = require('path')

app.set('port', 8005 || process.env.PORT)
app.set('views', path.join(__dirname, 'views'))
app.engine('html', require('ejs').renderFile)
app.set('view engine', 'ejs')

app.use(routes)
app.use(express.static(path.join(__dirname, 'public')))

app.listen(app.get('port'), () => console.log('escuchando ', app.get('port')))