import React, { useState } from 'react';
import ReactTooltip from 'react-tooltip';


import { images } from '../../constants';
import { AppWrap, MotionWrap } from '../../wrapper';
import { api } from '../../client';
import './Footer.scss';

const Footer = () => {
  const [formData, setFormData] = useState({ name: '', email: '', message: '' });
  const [isFormSubmitted, setIsFormSubmitted] = useState(false);
  const [loading, setLoading] = useState(false);

  const { username, email, message } = formData;

  const handleChangeInput = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = () => {
    setLoading(true);

    const contact = {
      name: formData.username,
      email: formData.email,
      message: formData.message,
    };

    api('/contacts', 'post', contact)
      .then(response => {
        console.log(response)
        setLoading(false);
        setIsFormSubmitted(true);
      })
      .catch(error => console.log(error))
  };

  return (
    <>
      <h2 className="head-text">Take a <span>coffee</span> & chat with <span>me</span></h2>

      <div className="app__footer-cards">
        <div className="app__footer-card ">
          <img src={images.email} alt="email" />
          <a 
            title='Click to copy'
            onClick={() =>  navigator.clipboard.writeText('el.yassine.azami@gmail.com')}
            className="p-text"
          >
            el.yassine.azami@gmail.com
          </a>  
        </div>
        <div className="app__footer-card">
          <img src={images.mobile} alt="phone" />
          <a href="tel:+33627702927" className="p-text">+33 6 27 70 29 27</a>
        </div>
      </div>
      {!isFormSubmitted ? (
        <div className="app__footer-form app__flex">
          <div className="app__flex">
            <input className="p-text" type="text" placeholder="Your Name" name="username" value={username} onChange={handleChangeInput} />
          </div>
          <div className="app__flex">
            <input className="p-text" type="email" placeholder="Your Email" name="email" value={email} onChange={handleChangeInput} />
          </div>
          <div>
            <textarea
              className="p-text"
              placeholder="Your Message"
              value={message}
              name="message"
              onChange={handleChangeInput}
            />
          </div>
          <button type="button" className="p-text" onClick={handleSubmit}>{!loading ? 'Send Message' : 'Sending...'}</button>
        </div>
      ) : (
        <div>
          <h3 className="head-text">
            Thank you for getting in touch!
          </h3>
        </div>
      )}
    </>
  );
};

export default AppWrap(
  MotionWrap(Footer, 'app__footer'),
  'contact',
  'app__whitebg',
);