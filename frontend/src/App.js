import './App.css';
import {TodayEvent,PreviousEvent,NextEvent} from './Events.js';

function App() {

  return (
    <div className="App">
      <h1>Dynamic Event Management System</h1>
      <h4>Today Event</h4>
      <TodayEvent />

      <h4>Previous Day Event Event</h4>
      <PreviousEvent />

      <h4>Next Day Event Event</h4>
      <NextEvent />
      <div className="copy">
      &copy; Mukesh Parmar
      </div>
    </div>
  );
}

export default App;