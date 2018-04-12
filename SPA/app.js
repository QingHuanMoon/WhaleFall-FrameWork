require('./bootstrap.js')

var san = require('san')
var sanRouter = require('san-router');
var router = sanRouter.router;
var Link = sanRouter.Link;

var Hello = require('./Components/Hello.san')


router.add({
  rule: '/',
  Component:Hello,
  target:'#app'
})

router.start()



