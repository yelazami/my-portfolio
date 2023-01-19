const api_url = process.env.REACT_APP_BACKEND_ENDPOINT
const api_token = process.env.REACT_APP_BACKEND_TOKEN

export const api = (endpoint, method='get') => {
  const api_endpoint = `${api_url}/api${endpoint}`

  const headers = new Headers({
    "Content-Type": "application/json",
    'Accept': 'application/json',
    "x-api-token": api_token,
  });

  return fetch(api_endpoint, {
    method: method, 
    headers: headers
  })

}

export const urlFor = (source) =>  `${api_url}/uploads/img/${source}`