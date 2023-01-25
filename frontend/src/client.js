const api_url = process.env.REACT_APP_BACKEND_ENDPOINT
const api_token = process.env.REACT_APP_BACKEND_TOKEN
const img_path = process.env.REACT_APP_BACKEND_IMG_PATH

export const api = (endpoint, method='get', body={}) => {
  const api_endpoint = `${api_url}/api${endpoint}`

  const headers = new Headers({
    "Content-Type": "application/json",
    'Accept': 'application/json',
    "x-api-token": api_token,
  });

  const options = {
    method: method, 
    headers: headers
  }

  if('post' === method && 0 !== Object.keys(body).length ) {
    Object.assign(options, {body: JSON.stringify(body)})
  }

  return fetch(api_endpoint, options)

}

export const urlFor = (source) =>  `${api_url}${img_path}${source}`