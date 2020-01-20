import React from 'react';
import ReactDOM from 'react-dom';
import Slider from "react-slick";
import axios from 'axios';
//import imageUrl from '/public/images/banners/banner.jpg';

class Marcas extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      marcas: ['keller.jpg', 'apia.jpg', 'zanella.jpg'],
    };
  }

  componentDidMount(){

  }
  render() {
    const { marcas } = this.state;
    return (
      <Slider
        speed={500}
        slidesToShow={3}
        slidesToScroll={1}
        infinite={true}
        dots={true}
        autoplay={true}
        autoplaySpeed={7000}
      >
       {marcas.map(marca => (
          <page><img src={"../images/marcas/"+marca}/></page>
       ))}
      </Slider>
    );
  }
}

ReactDOM.render(
  <Marcas />,
  document.getElementById('marcas')
);

