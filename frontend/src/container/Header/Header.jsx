import React from 'react';
import { motion } from 'framer-motion';

import { AppWrap } from '../../wrapper';
import { images } from '../../constants';
import './Header.scss';

const scaleVariants = {
  whileInView: {
    scale: [0, 1],
    opacity: [0, 1],
    transition: {
      duration: 1,
      ease: 'easeInOut',
    },
  },
};

const Header = () => (
  <div className="app__header app__flex">
    <motion.div
      whileInView={{ x: [-100, 0], opacity: [0, 1] }}
      transition={{ duration: 0.5 }}
      className="app__header-info"
    >
      <div className="app__header-badge">
        <div className="badge-cmp app__flex">
          <span>👋</span>
          <div style={{ marginLeft: 20 }}>
            <p className="p-text">Hello, I am</p>
            <h1 className="head-text">Yassine</h1>
          </div>
        </div>

        <div className="edu-cmp app__flex">
          <span>📚</span>
          
          <div style={{ marginLeft: 20 }}>
          <a href="https://formations.univ-larochelle.fr/msc-it-programme-software-architect?lang=en" target="_blank"><p className="bold-text">La Rochelle Université</p></a>
          <p className="p-text">MSc Computer Science SOFTWARE ARCHITECT</p>
          </div>
        </div>

        <div className="tag-cmp app__flex">
          <p className="p-text">PHP Backend</p>
          <p className="p-text">Developer</p>
        </div>
      </div>
    </motion.div>

    <motion.div
      whileInView={{ opacity: [0, 1] }}
      transition={{ duration: 0.5, delayChildren: 0.5 }}
      className="app__header-img"
    >
      <img src={images.profile} alt="profile_bg" className="img-display"/>
      <motion.img
        whileInView={{ scale: [0, 1] }}
        transition={{ duration: 1, ease: 'easeInOut' }}
        src={images.profile}
        alt="profile_circle"
        className="overlay_circle"
      />
    </motion.div>

    <motion.div
      variants={scaleVariants}
      whileInView={scaleVariants.whileInView}
      className="app__header-circles"
    >
      {[images.php, images.symfony, images.react].map((circle, index) => (
        <div className="circle-cmp app__flex" key={`circle-${index}`}>
          <img src={circle} alt="profile_bg"/>
        </div>
      ))}
    </motion.div>
  </div>
);

export default AppWrap(Header, 'home');