import React, { useState, useEffect } from 'react';
import { motion } from 'framer-motion';

import { AppWrap, MotionWrap } from '../../wrapper';
import './About.scss';
import { urlFor, api } from '../../client';

const About = () => {
  const [abouts, setAbouts] = useState([]);

  useEffect(() => {
      api('/abouts')
      .then(response => response.json())
      .catch(error => console.log(error))
      .then(data => setAbouts(data))
  }, []);

  return (
    <>
      {/* <h2 className="head-text">I Know that <span>Good Devoloper</span> <br />means  <span>Good Business</span></h2> */}

      <h4 className="head-text-about">Trapped in a cycle of <span>self-improvement</span> <br /> driven by my thirst for <span>knowledge and expertise</span></h4>
      
      <div className="app__profiles">
        {abouts.map((about, index) => (
          <motion.div
            whileInView={{ opacity: 1 }}
            whileHover={{ scale: 1.1 }}
            transition={{ duration: 0.5, type: 'tween' }}
            className="app__profile-item"
            key={about.title + index}
          >
            <img src={urlFor(about.imgUrl)} alt={about.title} />
            <h2 className="bold-text" style={{ marginTop: 20 }}>{about.title}</h2>
            <p className="p-text" style={{ marginTop: 10 }}>{about.description}</p>
          </motion.div>
        ))}
      </div>
    </>
  );
};

export default AppWrap(
  MotionWrap(About, 'app__about'),
  'about',
  'app__whitebg',
);