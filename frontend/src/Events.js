import React, { useState, useEffect } from "react";

const TodayEvent = () => {
  const [events, setEvents] = useState([]);
  useEffect(() => {
    fetch('http://localhost:8000/api/listevent/today')
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        console.log(data);
        setEvents(data);
      });
  }, []);
  return (
    <div className="cat">
      {events.map((event) => (
        <div key={event.id} className="card">
          Title: {event.title}<br/>
          Description: {event.description}<br/>
          Date: {event.date}<br/>
          Time: {event.time}<br/>
          Location: {event.location}
        </div>
      ))}
    </div>
  );
};

const PreviousEvent = () => {
  const [events, setEvents] = useState([]);
  useEffect(() => {
    fetch('http://localhost:8000/api/listevent/previousday')
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        console.log(data);
        setEvents(data);
      });
  }, []);
  return (
    <div className="cat">
      {events.map((event) => (
        <div key={event.id} className="card">
          Title: {event.title}<br/>
          Description: {event.description}<br/>
          Date: {event.date}<br/>
          Time: {event.time}<br/>
          Location: {event.location}
        </div>
      ))}
    </div>
  );
};

const NextEvent = () => {
  const [events, setEvents] = useState([]);
  useEffect(() => {
    fetch('http://localhost:8000/api/listevent/nextday')
      .then((res) => {
        return res.json();
      })
      .then((data) => {
        console.log(data);
        setEvents(data);
      });
  }, []);
  return (
    <div className="cat">
      {events.map((event) => (
        <div key={event.id} className="card">
          Title: {event.title}<br/>
          Description: {event.description}<br/>
          Date: {event.date}<br/>
          Time: {event.time}<br/>
          Location: {event.location}
        </div>
      ))}
    </div>
  );
}

export {TodayEvent,PreviousEvent,NextEvent};