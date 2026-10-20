import React, { Children } from 'react'
import { createBrowserRouter } from 'react-router-dom'
import HeroSection from '../sections/HeroSection'
import UpdateSection from '../sections/UpdateSection'
import ContactSection from '../sections/ContactSection'
import AboutSection from '../sections/AboutSection'
import SliderSection from '../sections/SliderSection'
import CourseSection from '../sections/CourseSection'
import NotesLayout from '../layout/NotesLayout'

const Home = () => {

  return (
    <>
    <SliderSection />
    <HeroSection />
    <UpdateSection />
    <AboutSection />
    </>
  )
}

export default Home;