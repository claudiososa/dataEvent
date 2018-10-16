
function selectedProvince(name){
  let contentHmtl = ''
  let provinces = [
    "SIN REGISTRAR",
    "BUENOS AIRES",
    "CATAMARCA",
    "CHACO",
    "CHUBUT",
    "CORDOBA",
    "CORRIENTES",
    "ENTRE RIOS",
    "FORMOSA",
    "JUJUY",
    "LA PAMPA",
    "LA RIOJA",
    "MENDOZA",
    "MISIONES",
    "NEUQUEN",
    "RIO NEGRO",
    "SALTA",
    "SAN JUAN",
    "SAN LUIS",
    "SANTA CRUZ",
    "SANTA FE",
    "SGO DEL ESTERO",
    "TIERRA DEL FUEGO",
    "TUCUMAN"
  ]
  var indiceActual = provinces.indexOf(name)

  provinces.forEach(function (element,i){
    if (i===indiceActual) {

    contentHmtl += `<option value="${element}" selected>${element}</option>`
    }
    contentHmtl += `<option value="${element}">${element}</option>`
  })

  return contentHmtl
}


// <option value="1">Supervisor/a</option>
// <option value="2">Director/a</option>
// <option value="3">Vicedirector/a</option>
// <option value="4">Profesor/a</option>
// <option value="5">Otros/a</option>

// 'Supervisor/a',
// 'Director/a',
// 'Vicedirector/a',
// 'Profesor/a',
// 'Otros/a'


function selectedPersonTipo(name){
  let contentHmtl = ''
  let tipo = {
    1:'Supervisor/a',
    2:'Director/a',
    3:'Vicedirector/a',
    4:'Profesor/a',
    5:'Otros/a'
  }

  for (var numero in tipo){
      if (numero==name) {
        contentHmtl += `<option value="${numero}" selected>${tipo[numero]}</option>`
      }else{
         contentHmtl += `<option value="${numero}">${tipo[numero]}</option>`
      }
  }
  return contentHmtl
}

function selectedPersonTipoEmpty(){
  let contentHmtl = ''
  let tipo = {
    1:'Supervisor/a',
    2:'Director/a',
    3:'Vicedirector/a',
    4:'Profesor/a',
    5:'Otros/a'
  }

  for (var numero in tipo){
     contentHmtl += `<option value="${numero}">${tipo[numero]}</option>`
  }
  return contentHmtl
}

function selectedPersonNivel(name){
  let contentHmtl = ''
  let nivel = {
    1:'Inicial',
    2:'Primario',
    3:'Secundario',
    4:'Técnica',
    5:'Superior',
    6:'Otros',

  }

  for (var numero in nivel){
      if (numero==name) {
        contentHmtl += `<option value="${numero}" selected>${nivel[numero]}</option>`
      }else{
         contentHmtl += `<option value="${numero}">${nivel[numero]}</option>`
      }
  }
//  alert(contentHmtl)
  return contentHmtl
}

function selectedPersonNivelEmpty(){
  let contentHmtl = ''
  let nivel = {
    1:'Inicial',
    2:'Primario',
    3:'Secundario',
    4:'Técnica',
    5:'Superior',
    6:'Otros',
  }

  for (var numero in nivel){
       contentHmtl += `<option value="${numero}">${nivel[numero]}</option>`
  }

  return contentHmtl
}

//searchProvince('SALTA')
