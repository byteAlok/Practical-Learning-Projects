import React from 'react'
import { SpanText, RegisterBtn, LoginBtn } from '../common/Templates'

const HeroSection = () => {
    return (
        <>
            <section className="relative pt-6 overflow-hidden bg-[radial-gradient(circle,_rgb(216,247,255),_rgb(225,250,255))] backdrop-blur-sm">
                {/* Overlay (behind everything) */}
                <div className="absolute top-0 left-0 w-full h-full bg-black/5 -z-10"></div>

                <div className="mx-auto px-4 sm:px-6">
                    <div className="flex flex-col md:flex-row items-center">

                        {/* Text Column */}
                        <div className="w-full md:w-6/12 lg:w-8/12 text-center md:text-left md:ps-5">
                            <h1 className="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 leading-tight">
                                Best online platform for <SpanText label="learning" />
                            </h1>

                            <p className="text-gray-700 mb-4 text-lg leading-relaxed">
                                Focused on skill development mainly through offline practice, consistent
                                learning, real projects, teamwork, and deep understanding. Online resources
                                are used only when essential or supplementary.
                            </p>

                            <div>
                                <RegisterBtn label="Join for free" className="me-2 sm:me-4 mb-4" />
                                <LoginBtn label="Learn More" />
                            </div>
                        </div>

                        {/* Image Column */}
                        <div className="w-full md:w-6/12 lg:4/12 h-[380px] sm:h-[420px] overflow-hidden mt-2 md:mt-0 
                            bg-[url('/src/assets/images/imageGraduationGirl.png')] bg-no-repeat bg-[length:550px_auto] sm:bg-[length:650px_auto] bg-[position:35%_32%]          sm:bg-[position:60%_34%] md:bg-[position:35%_34%] lg:bg-[position:24%_34%] bg-origin-content transition-transform duration-700 ease-in-out 
                            hover:scale-104"></div>

                    </div>
                </div>
            </section>
        </>
    )
}

export default HeroSection