
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
    alert(element)
    if (i===indiceActual) {

    contentHmtl += `<option value="${element}" selected>${element}</option>`
    }
    contentHmtl += `<option value="${element}">${element}</option>`
  })

  return contentHmtl
}


//searchProvince('SALTA')
