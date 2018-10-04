
function searchProvince(name){

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


  var province = provinces.indexOf(name)
  return province
}


searchProvince('SALTA')
